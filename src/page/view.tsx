import React from 'react';
import RestaurantCard from "../components/Restaurant/RestaurantCard";

const View: React.FC = () => {
    const data = window.WPData;

    console.log('Data passed to React:', data);

    if (!data) {
        return <p className="text-red-400">No data available.</p>;
    }

    const { restaurants } = data;

    return (
        <div className="max-w-4xl mx-auto p-6 bg-gray-200 shadow-lg rounded-lg">
            {restaurants && restaurants.length > 0 ? (
                <div className="mt-6">
                    {/* Optional title */}
                    <div className="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        {restaurants.map((restaurant, index) => (
                            <RestaurantCard
                                key={index}
                                image={restaurant.restaurant_image.guid}
                                name={restaurant.restaurant_name}
                                rating={Number(restaurant.restaurant_rating)}
                                countries={restaurant.countries}
                                amount={restaurant.amount}
                            />
                        ))}
                    </div>
                </div>
            ) : (
                <p className="mt-4 text-gray-500 text-center">No associated restaurants.</p>
            )}
        </div>
    );
};

export default View;
