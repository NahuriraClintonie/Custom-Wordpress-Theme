import React from 'react';

const View: React.FC = () => {
    // Access the full pod data passed from WordPress
    const data = window.WPData;

    // Log the raw data to ensure it's passed correctly
    console.log('Data passed to React:', data);

    // Get the actual page pod data from pageData
    const pageData = data.pagePod;

    // Log the full page data to understand its structure
    console.log('Full Page Pod Data:', pageData);

    return (
        <div className="max-w-3xl mx-auto p-6 bg-white shadow-lg rounded-lg">
            <h1 className="text-2xl font-bold text-gray-800">{pageData?.id || 'Untitled Page'}</h1>
            <p className="text-gray-600 mt-2">{pageData?.description || 'No description available.'}</p>

            {pageData?.restaurants && pageData.restaurants.length > 0 ? (
                <div className="mt-6">
                    <h3 className="text-xl font-semibold text-gray-700">Associated Restaurants:</h3>
                    <ul className="mt-2 list-disc list-inside text-gray-600">
                        {pageData.restaurants.map((restaurant, index) => (
                            <li key={index} className="py-1">{restaurant.post_title}</li>
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
