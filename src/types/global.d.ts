interface Window {
    WPData: {
        postId: string;
        pagePod: {
            id: string;
            page_name: string;
            description: string;
            restaurants: {
                post_title: string;
            }[];
        } | null;  // In case pagePod is not available or null
    };
}
