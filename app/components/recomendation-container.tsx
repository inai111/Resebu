import Link from "next/link";

export default function RecomendationContainer({ children, title, href }: Readonly<{ children?: React.ReactNode, title: string, href: string }>) {
    return (
        <section className="mb-3">
            <h1 className="text-lg font-semibold text-slate-200 tracking-wide border-b">{title}
                <Link href={href} className="float-end">
                    <i className="fi fi-rr-angle-small-right text-2xl font-extrabold"></i>
                </Link>
            </h1>
            <div>
                {children}
            </div>
        </section>
    );
}