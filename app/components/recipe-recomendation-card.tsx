import Link from "next/link";

export default function RecipeRecomendationCard() {
    return (
        <Link href="/recipes/" className="text-slate-300 w-full mb-1 inline-block hover:shadow-slate-400 p-1 shadow-transparent shadow">
            <i className="float-end fi fi-rr-angle-small-right text-2xl font-extrabold"></i>
            <div className="line-clamp-2 text-sm/4 mb-0">
                Resep dari ibu turun ke anak
                Resep dari ibu turun ke anak
                Resep dari ibu turun ke anak
            </div>
            <Link href='/mamat' className="text-xs font-bold ">Mamat</Link>
        </Link>
    );
}