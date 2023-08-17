import { Playfair_Display, Roboto } from "next/font/google";

const playfair = Playfair_Display({
    weight: ['400', '500', '700'],
    subsets: ['latin'],
    style: ['normal', 'italic'],
    display: 'swap',
    variable: '--font-playfair-display',

});

const roboto = Roboto({
    weight: ['400'],
    subsets: ['latin'],
    style: ['normal'],
    display: 'swap',
    variable: '--font-roboto',
});

export {playfair, roboto};

