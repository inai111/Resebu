'use client';
import DropdownCore from "@/app/components/dropdown-core";
import { type ChangeEvent, FormEvent, FormEventHandler, forwardRef, useEffect, useImperativeHandle, useRef, useState } from "react";

export interface EditRecipeItemRef {
    getRecipeItem: () => string;
}
interface EditRecipeItemProps {
    recipe?: string
}

const EditRecipeItem = forwardRef<EditRecipeItemRef, EditRecipeItemProps>(({ recipe = 'ingrident' }, ref) => {
    const [recipeText, setRecipe] = useState(recipe);
    useImperativeHandle(ref, () => ({
        getRecipeItem: () => recipeText
    }))
    function handleChange(e: ChangeEvent<HTMLInputElement>) {
        console.log(1)
        const elem = e.target;
        if (elem) {
            console.log(2)
            let value = elem.value.trim();
            if (value.length > 0) {
                console.log(3)
                setRecipe(elem.value)
            }
        }
    }
    return (
        <DropdownCore>
            {({ isOpen, toggle, dropdownRef }) => {
                return (
                    <li className="flex items-center gap-3">
                        <div ref={dropdownRef} className="mb-1 cursor-pointer flex gap-2 items-center w-full">
                            <button onClick={toggle} className="cursor-pointer w-15 p-1 text-sm/3 align-middle rounded bg-red-600 text-slate-100">
                                Delete
                            </button>
                            {
                                isOpen ?
                                    <input type="text" defaultValue={recipeText} onChange={handleChange} placeholder="1 tsp Chili powder" className="text-slate-600 placeholder:text-slate-300 rounded px-2 flex-1" />
                                    :
                                    <div onClick={toggle} className="px-2">{recipeText}</div>
                            }
                        </div>
                    </li>)
            }}
        </DropdownCore>
    );
});
EditRecipeItem.displayName = 'EditRecipeItem';
export default EditRecipeItem;
// export default function EditRecipeItem({ recipe = 'ingrident' }: Readonly<{ recipe: string }>) {
//     const [onEdit, setEdit] = useState(false);
//     const editElemRef = useRef<HTMLDivElement>(null);
//     const [recipeEdit, setRecipeEdit] = useState(recipe);
//     const limit = 100;


//     return (
//         <DropdownCore>
//             {({ isOpen, toggle, dropdownRef }) => {
//                 return (
//                     <li className="flex items-center gap-3">
//                         <div ref={dropdownRef}>
//                             {
//                                 isOpen ?
//                                     <div className="flex gap-2 items-center">
//                                         <input type="text" defaultValue={recipe} placeholder="1 tsp Chili powder" className="text-slate-600 placeholder:text-slate-300 rounded px-2 " />
//                                         <button onClick={toggle} className="cursor-pointer rounded text-sm bg-slate-200 px-3">Save</button>
//                                     </div> :
//                                     <div onClick={toggle} className="mb-1 cursor-pointer">
//                                         <span>{recipe}</span>
//                                     </div>
//                             }
//                         </div>
//                     </li>)
//             }}
//         </DropdownCore>
//     );
// }