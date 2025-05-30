import Link from "next/link";

export default function ChefRecomendationCard() {
    return (
        <Link href={'/chef/asdas'} className="flex mb-3 items-center w-full gap-1 bg-slate-100 p-1 ps-2 pe-4 rounded-full">
            <div>
                <img src="https://png.pngtree.com/png-clipart/20240314/original/pngtree-goat-s-face-on-eid-ul-adha-png-image_14587232.png"
                    alt="goat"
                    className="object-center rounded-full object-contain w-10 aspect-square bg-slate-500/60" />
            </div>
            <div className="text-slate-700 flex-1">
                <div className="pb-0 justify-between flex items-center">
                    <h3 className="w-50 line-clamp-1 font-semibold">Mamat Solar nursoleh skakakak</h3>
                    <i className="fi fi-rr-angle-small-right text-xl/3 font-extrabold block"></i>
                </div>
                <h3 className="text-xs mb-1">@Resep</h3>
            </div>
        </Link>
    );
}