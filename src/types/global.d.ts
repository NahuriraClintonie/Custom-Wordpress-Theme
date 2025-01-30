interface Window {
    WPData: {
        postId: number;
        pageData: {
            page_name: string;
            page_description: string;
        };
        menus: {
            menu_image: {
                guid: string; // Image URL
            };
            menu_rating: string;
            menu_name: string;
            countries: string[];
            amount: string;
        }[];
    };
}
