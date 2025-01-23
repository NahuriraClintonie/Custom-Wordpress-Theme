import useSWR from 'swr';

interface PodsField {
    id: number;
    description: string;
}

const fetcher = async (url: string) => {
    const postId = window.WPData?.postId;
    const response = await fetch(url);
    const data: PodsField[] = await response.json();
    console.log(data);
    return data.filter((item) => {
        const itemId: string = item.id.toString();
        return itemId === postId;
    })[0];
};

const View = () => {
    const { data, error } = useSWR(
        '/wp-json/wp/v2/pages',
        fetcher
    );

    if (error) return <p>Error loading data.</p>;
    if (!data) return <p>Loading...</p>;

    return (
        <div>
            <p>
                point
            </p>
            <p>
                {data.description}
            </p>
        </div>
    );
};

export default View;
