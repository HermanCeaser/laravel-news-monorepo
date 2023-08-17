"use client"
import Link from "next/link";
import { useEffect, useState } from "react";
import DarkModeButton from "./DarkModeButton";
import { signIn, signOut, useSession, getProviders } from 'next-auth/react'
import Image from "next/image";
import Dropdown from './Dropdown';
import { DropdownButton, DropdownLink } from './DropdownLink';

function Navbar(props) {
    const isUserLoggedIn = false
    const [open, setOpen] = useState(false)

    const [providers, setProviders] = useState(null);

    useEffect(() => {
        const setUpProviders = async () => {
            const res = await getProviders();

            setProviders(res);
        }

        setUpProviders();
    })

    console.log(providers);


    return (


        <nav className="flex-between w-full mb-16 pt-3">
            <div className="flex justify-between h-9">
                <div className="flex items-center">
                    <div className="bg-orange-700 text-gray-100 px-2 py-1 rounded font-bold mr-1">News</div>
                    <div className="text-gray-700 font-bold logo_text">Portal</div>
                </div>
            </div>

            <div className="flex items-center justify-end space-x-2">
                <DarkModeButton />
                {/* Desktop Navigation */}
                <div className="sm:flex hidden">
                    {isUserLoggedIn ? (
                        <div className="flex gap-3 md-gap-5">
                            <button type="button" className="outline_btn">
                                Sign Out
                            </button>

                            <Link href="/profile">
                                <Image
                                    src="/assets/images/default-profile.png"
                                    width={37}
                                    height={37}
                                    className="rounded-full"
                                    alt="Profile"
                                ></Image>
                            </Link>
                        </div>
                    ) : (
                        <>
                            {providers &&
                                Object.values(providers).map((provider) => (
                                    <>
                                        <Link
                                            href="/login"

                                            className="black_btn">
                                            Sign In
                                        </Link>
                                        <Link
                                            href="/register"
                                            className="ml-2 outline_btn">
                                            Sign Up
                                        </Link>
                                    </>

                                ))}
                        </>
                    )}
                </div>

                {/* Hamburger */}
                <div className="-mr-2 flex relative items-center sm:hidden">
                    {isUserLoggedIn ? (
                        <div className="flex">
                            {/* <Image
                                src="/assets/images/default-profile.png"
                                width={37}
                                height={37}
                                className="rounded-full"
                                alt="Profile"
                                onClick={()=> setOpen(open => !open)}
                            ></Image> */}


                            <Dropdown
                                align="right"
                                width="48"
                                trigger={
                                    <Image
                                        src="/assets/images/default-profile.png"
                                        width={37}
                                        height={37}
                                        className="rounded-full"
                                        alt="Profile"
                                    ></Image>
                                }>

                                <Link
                                    href="/profile"
                                    className="text-left block px-4 py-2 text-sm leading-5 text-gray-700 bg-gray-100 focus:outline-none transition duration-150 ease-in-out"
                                    onClick={() => setOpen(false)}>
                                    MyProfile
                                </Link>

                                {/* Authentication */}
                                <DropdownButton
                                    className="mt-3  w-full black_btn"
                                    onClick={() => console.log('logout')}>
                                    Logout
                                </DropdownButton>
                            </Dropdown>
                        </div>
                    ) : (
                        <>
                            {providers &&
                                Object.values(providers).map((provider) => (
                                    <>
                                        <Link
                                            href="/login"

                                            className="black_btn">
                                            Sign In
                                        </Link>
                                        <Link
                                            href="/register"
                                            className="ml-2 outline_btn">
                                            Sign Up
                                        </Link>
                                    </>
                                ))}
                            <button
                                onClick={() => setOpen(open => !open)}
                                className="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg
                                    className="h-6 w-6"
                                    stroke="currentColor"
                                    fill="none"
                                    viewBox="0 0 24 24">
                                    {open ? (
                                        <path
                                            className="inline-flex"
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                            strokeWidth="2"
                                            d="M6 18L18 6M6 6l12 12"
                                        />
                                    ) : (
                                        <path
                                            className="inline-flex"
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                            strokeWidth="2"
                                            d="M4 6h16M4 12h16M4 18h16"
                                        />
                                    )}
                                </svg>
                            </button>

                            {open && (

                                <div className="dropdown">

                                    <Link
                                        href="/register"
                                        className="ml-2 outline_btn">
                                        Sign Up
                                    </Link>
                                </div>
                            )}
                        </>

                    )}


                </div>
            </div>
        </nav>
    );
}

export default Navbar;