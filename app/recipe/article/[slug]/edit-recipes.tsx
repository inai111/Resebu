'use client';
import { FormEvent, FormEventHandler, useEffect, useRef, useState } from "react";
import { text } from "stream/consumers";
import EditRecipeItem from "./edit-recipe-item";

export default function EditRecipes() {
    const [onEdit, setEdit] = useState(false);
    const [recipes, setRecipes] = useState<string[]>([]);
    const textAreaRef = useRef<HTMLTextAreaElement>(null);
    const editElemRef = useRef<HTMLDivElement>(null);
    const [limitLength, setLimitLength] = useState(0);
    const limit = 100;

    function addRecipe() {
        setRecipes(_ => [...recipes, 'rec']);
    }

    function deleteRecipe(idx:number){
        console.log(idx)
        setRecipes(recipes=>recipes.filter((ar,id)=>id!=idx));
    }

    function getRecipes(){
        console.log(recipes)
    }

    function handleChange(event:React.ChangeEvent<HTMLSpanElement>){
        console.log(123321)
        let elem = event.target;
        if(!elem) return;
    }

    return (
        <ul className="ms-5 [&_li]:py-sm [&_li]:border-b [&_li]:border-dashed [&_li]:border-slate-500">
            <li className="">
                <button onClick={addRecipe} className="cursor-pointer hover:bg-slate-200 active:bg-slate-300 px-5 rounded">
                    <i className="fi fi-rr-plus text-xs/0"></i> Add
                </button>
            </li>
            {recipes.map((recipe,idx) => (
                <EditRecipeItem recipe={recipe} key={`key-${idx}`} />
            ))}
                {/* <li className="flex items-center gap-3" key={idx}>
                    <button onClick={()=>deleteRecipe(idx)} className="h-5 aspect-square rounded-full bg-red-600 align-middle shadow cursor-pointer text-slate-200 text-xs/0">
                        <i className="fi fi-rr-cross"></i>
                    </button>
                    <div className="py-sm border-b border-slate-400 border-dashed mb-1">
                        <bdi className="font-semibold">{recipe.quantity}</bdi> <span onChange={handleChange} contentEditable>{recipe.name}</span>
                    </div>
                    <button onClick={getRecipes} className="h-5 ms-auto aspect-square rounded-full bg-green-600 align-middle shadow cursor-pointer text-slate-200 text-xs/0">
                        <i className="fi fi-rr-plus"></i>
                    </button>
                </li> */}
            {/* <li>
                <div className="py-sm border-b border-slate-400 border-dashed mb-1">
                    <bdi className="font-semibold">12 siung</bdi> <span>Bawang putih</span>
                </div>
                <div className="flex items-center gap-4">
                    <button className="h-5 aspect-square rounded-full bg-green-600 align-middle shadow cursor-pointer text-slate-200 text-xs/0">
                        <i className="fi fi-rr-plus"></i>
                    </button>
                    <button className="h-5 aspect-square rounded-full bg-red-600 align-middle shadow cursor-pointer text-slate-200 text-xs/0">
                        <i className="fi fi-rr-cross"></i>
                    </button>
                </div>
            </li> */}
            {/* <li className="py-sm">
                <bdi className="font-semibold">Sambal</bdi>
                <ul className="ms-5">
                    <li className="py-sm border-b border-slate-400 border-dashed">
                        <i className="fi w-6 inline-block fi-rr-arrow-turn-down-right"></i>
                        asdas
                    </li>
                    <li className="py-sm border-b border-slate-400 border-dashed">
                        <div className="flex items-center">
                            <i className="fi w-6 inline-block fi-rr-arrow-turn-down-right"></i>
                            <div>asdasd</div>
                            <div className="ms-auto flex gap-5">
                                <button className="h-5 aspect-square rounded-full bg-green-600 align-middle shadow cursor-pointer text-slate-200 text-xs/0">
                                    <i className="fi fi-rr-plus"></i>
                                </button>
                                <button className="h-5 aspect-square rounded-full bg-red-600 align-middle shadow cursor-pointer text-slate-200 text-xs/0">
                                    <i className="fi fi-rr-cross"></i>
                                </button>
                            </div>
                        </div>
                    </li>
                    <li className="py-sm border-b border-slate-400 border-dashed">
                        <i className="fi w-6 inline-block fi-rr-arrow-turn-down-right"></i>
                        asdas
                    </li>
                </ul>
            </li> */}
            {/* <li className="py-sm border-b border-slate-400 border-dashed">
                <bdi className="font-semibold">2 siung</bdi> <span>Bawang bombai</span>
            </li>
            <li className="py-sm border-b border-slate-400 border-dashed">
                <bdi className="font-semibold">2 cm</bdi> <span>Jahe</span>
            </li>
            <li className="py-sm border-b border-slate-400 border-dashed">
                <bdi className="font-semibold">2 cm</bdi> <span>Lengkuas</span>
            </li>
            <li className="py-sm border-b border-slate-400 border-dashed">
                <bdi className="font-semibold">2 batang</bdi> <span>Sereh</span>
            </li>
            <li className="py-sm border-b border-slate-400 border-dashed">
                <bdi className="font-semibold">3-4 sdm</bdi> <span>Kecap manis</span>
            </li>
            <li className="py-sm border-b border-slate-400 border-dashed">
                <bdi className="font-semibold">1 sdm</bdi> <span>Saos tiram</span>
            </li>
            <li className="py-sm border-b border-slate-400 border-dashed">
                <bdi className="font-semibold">1/2 sdt</bdi> <span>Garam</span>
            </li>
            <li className="py-sm border-b border-slate-400 border-dashed">
                <bdi className="font-semibold">1/2 sdt</bdi> <span>Penyedap rasa</span>
            </li>
            <li className="py-sm border-b border-slate-400 border-dashed">
                <bdi className="font-semibold">8 g</bdi> <span>Kaldu bubuk</span>
            </li>
            <li className="py-sm border-b border-slate-400 border-dashed">
                <bdi className="font-semibold">1/2 sdt</bdi> <span>Gula</span>
            </li>
            <li className="py-sm border-b border-slate-400 border-dashed">
                <bdi className="font-semibold">1 sdt</bdi> <span>Merica</span>
            </li>
            <li className="py-sm border-b border-slate-400 border-dashed">
                <bdi className="font-semibold">300 ml</bdi> <span>air</span>
            </li> */}

        </ul>
    );
}