'use client';
import { useEffect, useRef, useState } from "react";
import ChefRecomendationCard from "./chef-recomendation-card";
import RecipeRecomendationCard from "./recipe-recomendation-card";
import RecomendationContainer from "./recomendation-container";

export default function AppSidebarRecomendation({ children }: Readonly<{ children: React.ReactNode }>) {
    const container = useRef<HTMLDivElement>(null);
    const content = useRef<HTMLDivElement>(null);
    const [open, setOpen] = useState(true);

    function toggleButton() {
        let cont = container.current;
        let conte = content.current;
        if (!cont || !conte) return;
        setOpen(!open);
        if (!open) {
            conte.classList.remove('hidden');
        }else{
            conte.classList.add('hidden');
        }
        let timeoutAnimation = setTimeout(() => {
            if (open) {
                conte.classList.add('hidden');
            }
        }, 100);
    }
    return (
        <div className="flex">
            <div ref={container} className={`${open?'w-80':''} z-20 hidden md:block`}>
                <div className={`fixed top-20 h-[85vh]`}>
                    <div className="absolute z-30 -top-13 left-5 items-center px-2">
                        <button onClick={toggleButton} className="cursor-pointer">
                            <i className="fi fi-br-bars-staggered text-2xl"></i>
                        </button>
                    </div>
                    <div ref={content} className={`px-4 py-2 h-full w-80 overflow-y-scroll bg-slate-800 transition duration-300 ${open ? '' : '-translate-x-60'}`}>
                        <RecomendationContainer title="Teman Masakmu" href="/chef">
                            <ChefRecomendationCard />
                            <ChefRecomendationCard />
                            <ChefRecomendationCard />
                        </RecomendationContainer>
                        <RecomendationContainer title="Resep Menarik Dicoba" href="/recipes">
                            <RecipeRecomendationCard />
                            <RecipeRecomendationCard />
                            <RecipeRecomendationCard />
                            <RecipeRecomendationCard />
                            <RecipeRecomendationCard />
                            <RecipeRecomendationCard />
                        </RecomendationContainer>
                    </div>
                </div>
            </div>
            <div className="flex-1">
                {children}
            </div>
        </div>
    );
}