// In your RestaurantCard component
import React from 'react';
import { countryMapping } from '../../types/countries';

interface RestaurantCardProps {
    image: string;
    name: string;
    rating: number;
    countries: string[];
    amount: string;
}

const RestaurantCard: React.FC<RestaurantCardProps> = ({ image, name, rating, countries, amount }) => {
    const totalStars = 5;
    const stars = Array.from({ length: totalStars }, (_, index) => index < rating);

    // Map the country abbreviations to full names
    const fullCountryNames = countries.map((country) => countryMapping[country] || country); // Fallback to abbreviation if not found

    return (
        <div className="w-64 h-96 bg-white border border-gray-300 rounded-lg overflow-hidden flex flex-col">
            <div className="h-3/5 w-full overflow-hidden">
                <img src={image} alt={name} className="w-full h-full object-cover" />
            </div>
            <div className="text-xl font-semibold p-4">{name}</div>
            <div className="flex mb-2 ml-4">
                {stars.map((isFilled, index) => (
                    <span key={index} className={isFilled ? "text-yellow-500 text-2xl" : "text-gray-300 text-2xl"}>★</span>
                ))}
            </div>
            <div className="flex justify-between p-4">
                <div className="text-sm text-gray-600">
                    {fullCountryNames.join(' | ')}
                </div>
                <div className="text-lg font-semibold">
                    {amount}
                </div>
            </div>
        </div>
    );
};

export default RestaurantCard;
