import React from 'react';

console.log('React component is rendering!');

const View: React.FC = () => {
    const data = window.WPData;

    console.log('Data passed to React:', data);

    if (!data) {
        return <p className="text-red-400">No data available.</p>;
    }

    const { pageData, restaurants } = data;

    return (
        <div className="max-w-3xl mx-auto p-6 bg-white shadow-lg rounded-lg">
            <h1 className="text-2xl font-bold text-gray-800">{pageData?.page_name || 'Untitled Page'}</h1>
            <p className="text-gray-600 mt-2">{pageData?.page_description || 'No description available.'}</p>

            {restaurants && restaurants.length > 0 ? (
                <div className="mt-6">
                    <h3 className="text-xl font-semibold text-gray-700">Associated Restaurants:</h3>
                    <ul className="mt-2 list-disc list-inside text-gray-600">
                        {restaurants.map((restaurant, index) => (
                            <li key={index} className="py-1 flex items-center space-x-4">
                                <img src={restaurant.restaurant_image.guid} alt="Restaurant" className="w-12 h-12 rounded-full"/>
                                <span>{restaurant.amount} - Rating: {restaurant.restaurant_rating}</span>
                            </li>
                        ))}
                    </ul>
                </div>
            ) : (
                <p className="mt-4 text-gray-500">No associated restaurants.</p>
            )}
        </div>
    );
};

export default View;
