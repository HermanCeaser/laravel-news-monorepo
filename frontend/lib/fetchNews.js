import { gql } from "graphql-request";
import sortNewsByImage from "./sortNewsByImage";

const fetchNews = async (category, keywords, isDynamic) => {
  // GraphQL query

  const query = gql`
    {
      myQuery(
        access_key: $access_key
        categories: $categories
        countries: "us"
        sort: "published_desc"
        keywords: $keywords
      ) {
        data {
          author
          category
          image
          description
          country
          language
          published_at
          source
          title
          url
        }
        pagination {
          count
          limit
          offset
          total
        }
      }
    }
  `;

  // Fetch function with Next.js 13 caching...

  const res = await fetch(
    "http://localhost:3000/api/idolized-gnat/__graphql",
    {
      method: "POST",
      cache: isDynamic ? "no-cache" : "default",
      next: isDynamic ? { revalidate: 0 } : { revalidate: 20 },
      headers: {
        "Content-Type": "application/json",
        Authorization: `Apikey ${process.env.CEASER_API_KEY}`,
      },
      body: JSON.stringify({
        query,
        variables: {
          access_key: process.env.MEDIASTACK_API_KEY,
          categories: category,
          keywords: keywords,
        },
      }),
    }
  );

  const newsResponse = await res.json();
  // Sort function by images vs not images present

  const news = sortNewsByImage(newsResponse.data.myQuery);

  // return news;

  return news;
};


export default fetchNews;