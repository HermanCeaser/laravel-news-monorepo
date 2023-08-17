import React from "react";
import { Bars3Icon } from "@heroicons/react/24/solid";
import Link from "next/link";
import NavLinks from "./NavLinks";
import Navbar from "./Navbar";
// import SearchBox from "./SearchBox";

function Header() {
    return (
      <header>
        <Navbar />
  
        <NavLinks />
  
        {/* <SearchBox /> */}
      </header>
    );
  }
  
  export default Header;
  