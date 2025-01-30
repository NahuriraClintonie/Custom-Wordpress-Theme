import React from 'react';

// Interface for the props expected by the RestaurantCard component
interface RestaurantCardProps {
    image: string;
    name: string;
    rating: number;
    countries: string[];
    amount: string;
}

const RestaurantCard: React.FC<RestaurantCardProps> = ({ image, name, rating, countries, amount }) => {
    const totalStars = 5;

    // Generate an array representing the stars (filled or unfilled)
    const stars = Array.from({ length: totalStars }, (_, index) => index < rating);

    return (
        <div className="w-64 h-96 border border-gray-300 rounded-lg overflow-hidden flex flex-col">
            {/* Image */}
            <div className="h-3/5 w-full overflow-hidden">
                <img src={image} alt={name} className="w-full h-full object-cover" />
            </div>

            {/* Name */}
            <div className="text-xl font-semibold p-4">{name}</div>

            {/* Stars */}
            <div className="flex mb-2 ml-4">
                {stars.map((isFilled, index) => (
                    <span key={index} className={isFilled ? "text-yellow-500 text-xl" : "text-gray-300 text-xl"}>★</span>
                ))}
            </div>

            {/* Countries and Amount */}
            <div className="flex justify-between p-4">
                <div className="text-sm text-gray-600">
                    {countries.join(' | ')}
                </div>
                <div className="text-lg font-semibold">
                    {amount}
                </div>
            </div>
        </div>
    );
};

export default RestaurantCard;
