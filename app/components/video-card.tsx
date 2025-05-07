'use client'
import Link from "next/link";
import VideoCardDropdown from "./video-card-dropdown";
import { useEffect } from "react";

export default function VideoCard() {
    return (
        <div className="shadow-lg pb-3 hover:shadow-slate-300 rounded-lg bg-slate-50">
            <Link href="/recipe/video/apaan">
                <img src="https://png.pngtree.com/png-vector/20240411/ourmid/pngtree-brown-goat-face-natural-portrait-png-image_12114814.png"
                    alt=""
                    className="lg:w-100 w-80 h-40 object-cover object-center mb-2 rounded lg" />
            </Link>
            <div className="relative px-3">
                <div className="float-end absolute -right-2">
                    <VideoCardDropdown link="/apaan" />
                </div>
                <h2 className="font-bold text-lg/5 line-clamp-2 me-7">
                    <Link href="/recipe/video/apaan">Appan Ini apakah sebuah judul</Link>
                </h2>
                <Link className="text-slate-500 text-sm line-clamp-1" href="/chef/mamat">Mamat </Link>
                <div className="text-slate-500 text-sm">Just Updated</div>
            </div>
        </div>
    );
}