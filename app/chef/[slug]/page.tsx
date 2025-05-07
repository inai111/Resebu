export default async function Page({ params }: Readonly<{ params: Promise<{ slug: string }> }>) {
    const { slug } = await params;
    console.log(slug);
    return (
        <>
        </>
    );

}