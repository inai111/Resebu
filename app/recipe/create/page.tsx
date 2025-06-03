'use client';
import AppNavbar from "@/app/components/app-navbar";
import RecipeDraftContainer from "@/app/components/recipe-draft-container";
import { useState } from "react";

export default function Page() {
    const [isLoading,setLoading] = useState(false);
    function createWorkplace(){
        if(isLoading) return;
        console.log('loading')
        setLoading(true);
        setTimeout(()=>setLoading(false),3000);
    }
    return (
        <>
            <AppNavbar />
            <div className="flex justify-center items-center py-12">
                <div className="bg-slate-100 shadow p-6 rounded md:w-[70vw] lg:w-[50vw] min-h-[50vh] max-h-[75vh]">
                    <h1 className="mb-3 text-2xl text-slate-600 font-bold">Create new Recipe
                        {isLoading?(<span className="float-end cursor-progress text-sm/0 backdrop-blur-2xl bg-black/40 rounded px-3 text-slate-200 py-1"><i className="fi me-2 fi-br-spinner animate-spin inline-block"></i>
                        Loading <span className="animate-pulse">.</span> <span className="animate-pulse">.</span> <span className="animate-pulse">.</span> </span>):''}</h1>
                    <div className="flex h-full gap-3 flex-wrap">
                        <div className="h-full rounded flex justify-center">
                            <div className="p-1 text-slate-600">
                                <button onClick={createWorkplace} className="block px-3 mb-2 cursor-pointer hover:bg-slate-300 active:bg-slate-400">
                                    <i className="fi fi-rs-plus align-middle mx-2"></i>
                                    create new Article
                                </button>
                                <button onClick={createWorkplace} className="block px-3 mb-2 cursor-pointer hover:bg-slate-300 active:bg-slate-400">
                                    <i className="fi fi-rs-plus align-middle mx-2"></i>
                                    create new Video Article
                                </button>
                            </div>
                        </div>
                        <div className="h-full rounded flex-1">
                            <h1 className="text-slate-600 font-bold">Draft</h1>
                            <RecipeDraftContainer onClick={createWorkplace} />
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}