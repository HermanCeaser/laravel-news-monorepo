"use client"
import React from "react";
import { ThemeProvider } from "next-themes";
import { SessionProvider } from "next-auth/react";



function Providers({ children, session }) {

    return (
        <ThemeProvider enableSystem={false} attribute="class">
            <SessionProvider session={session}>
                {children}
            </SessionProvider>
        </ThemeProvider>
    );
}

export default Providers;