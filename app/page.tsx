import type { Metadata } from "next";
import Link from "next/link";
import VideoCard from "./components/video-card";
import AppNavbar from "./components/app-navbar";
import AppSidebarRecomendation from "./components/app-sidebar-recomendation";

export const metadata: Metadata = {
  title: "!Resebu!"
};
export default function Home() {
  return (
    <>
      <AppNavbar />
      <main>
        <AppSidebarRecomendation>
          <div className="row-start-2">
            <div className="grid lg:grid-cols-4 md:grid-cols-3 grid-cols-2 gap-2 mx-2">
              <div className="lg:col-span-3 col-span-2 row-span-2 aspect-auto max-h-125 relative rounded overflow-hidden">
                <Link href="/" className="block h-full">
                  <img src="https://media.istockphoto.com/id/903592580/photo/portrait-of-a-goat-showing-tongue.jpg?s=612x612&w=0&k=20&c=ybl1XF7yF9AebG3dtAxvSRriTOkFZT2hpkAqKbugdo0="
                    alt="cover"
                    className="w-full h-full object-center object-cover" />
                </Link>
                <div className="bottom-0 absolute w-full backdrop-blur-md bg-black/40 h-30 px-3 lg:px-5 py-1">
                  <div className="flex justify-between">
                    <div className="flex-1">
                      <h1 className="text-slate-100 font-semibold uppercase tracking-wider text-xs lg:text-lg">paling dicari : </h1>
                      <Link href="/">
                        <div className="lg:text-2xl line-clamp-2 text-slate-100">
                          Resep Ikan goreng di tumis dengan kangkung, bumbu halal.
                        </div>
                      </Link>
                    </div>
                    <div className="max-w-40 hidden md:block">
                      <h1 className="text-slate-100 font-semibold text-xs">Shout out : </h1>
                      <div className="text-center">
                        <Link href="/chef/mamat" className="text-slate-100 inline-block font-semibold hover:text-slate-200 text-sm">
                          <img src="https://media.istockphoto.com/id/903592580/photo/portrait-of-a-goat-showing-tongue.jpg?s=612x612&w=0&k=20&c=ybl1XF7yF9AebG3dtAxvSRriTOkFZT2hpkAqKbugdo0="
                            alt="cover"
                            className="object-center object-cover mx-center rounded-full h-15 w-15 mt-1" />
                          <small className="line-clamp-1">Mamat</small>
                        </Link>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <VideoCard />
              <VideoCard />

              <div className="lg:col-span-4 md:col-span-3 mt-5 col-span-2"></div>

              <VideoCard />
              <VideoCard />
              <VideoCard />
              <VideoCard />
              <VideoCard />
              <VideoCard />
            </div>
          </div>
        </AppSidebarRecomendation>
      </main>
    </>
  );
}
