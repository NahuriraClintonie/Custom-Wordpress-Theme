interface Window {
    WPData: {
        postId: number;
        pageData: {
            page_name: string;
            page_description: string;
        };
        restaurants: {
            restaurant_image: {
                guid: string; // Image URL
            };
            restaurant_rating: string;
            restaurant_name: string;
            countries: string[];
            amount: string;
        }[];
    };
}
