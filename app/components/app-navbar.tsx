import Image from "next/image";
import Link from "next/link";
import defaultImage from '@/public/default.png'
import ChefRecomendationCard from "./chef-recomendation-card";
import RecomendationContainer from "./recomendation-container";
import RecipeRecomendationCard from "./recipe-recomendation-card";

export default function AppNavbar({ children }: Readonly<{ children?: React.ReactNode }>) {
  function apaan() {
    alert('123')
  }

  return (
    <div>
      {/* <nav className="flex px-3 items-center py-1 sticky top-0 w-full bg-slate-100/60 backdrop-blur-md">
        <button className="cursor-pointer">
          <i className="fi fi-br-bars-staggered text-2xl"></i>
        </button>
        <Link href='/' className="text-black flex items-center text-3xl font-bold cursor-pointer hover:text-slate-800 w-80 justify-center">!Resebu!
          <Image
            src={defaultImage}
            alt="!Resebu!"
            className="w-15 ms-2"
          />
        </Link>

        <div className="ms-auto flex items-center gap-3 text-slate-700">
          <button className="rounded-full me-2 px-2 py-1 text-slate-400 bg-slate-200 hover:text-slate-500 cursor-pointer border hover:border-slate-700 border-slate-500 flex items-center">
            <i className="fi fi-br-search inline-block w-8 text-md/0"></i>Pencarian
          </button>
          <Link href="/recipe/create" className="flex items-center">
            <i className="fi fi-rr-square-plus text-2xl/1 inline-block w-8"></i>Tambah Resep
          </Link>
          <div className="h-8 w-2 border-e-2 border-e-slate-200"></div>
          <button className="cursor-pointer">
            <i className="fi fi-ss-user text-xl w-8 inline-block"></i>
            <i className="fi fi-rr-caret-down text-lg float-end"></i>
          </button>
        </div>
      </nav> */}
      <div className="flex">
        <div className="sticky top-0 h-svh w-80">
          <div className="flex items-center h-20 px-2 bg-slate-100/60">
            <button className="cursor-pointer">
              <i className="fi fi-br-bars-staggered text-2xl"></i>
            </button>
            <Link href='/' className="text-black flex items-center text-3xl font-bold cursor-pointer hover:text-slate-800 w-80 justify-center">!Resebu!
              <Image
                src={defaultImage}
                alt="!Resebu!"
                className="w-15 ms-2"
              />
            </Link>
          </div>
          <div className="px-4 py-2 h-full overflow-y-scroll bg-slate-800">
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
        <div className="flex-1">
          <nav className="flex px-3 h-20 items-center py-1 sticky top-0 w-full z-10 bg-slate-100/60 backdrop-blur-md">
            <div className="ms-auto flex items-center gap-3 text-slate-700">
              <button className="rounded-full me-2 px-2 w-60 py-1 text-slate-400 hover:text-slate-500 cursor-pointer border hover:border-slate-700 border-slate-500 flex items-center">
                <i className="fi fi-br-search inline-block w-8 text-md/0"></i>Pencarian
              </button>
              <Link href="/recipe/create" className="flex items-center">
                <i className="fi fi-rr-square-plus text-2xl/1 inline-block w-8"></i>Tambah Resep
              </Link>
              <div className="h-8 w-2 border-e-2 border-e-slate-200"></div>
              <button className="cursor-pointer">
                <i className="fi fi-ss-user text-xl w-8 inline-block"></i>
                <i className="fi fi-rr-caret-down text-lg float-end"></i>
              </button>
            </div>
          </nav>
          {children}
        </div>
      </div>
    </div>
  );
}
