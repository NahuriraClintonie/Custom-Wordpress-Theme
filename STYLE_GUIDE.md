# E-Commerce Tailwind CSS Style Guide

This style guide is intended to help you build a responsive e-commerce
website using Tailwind CSS. Focused on the key components like the header, footer, and product cards, 
this guide ensures consistency and usability.

---

## General Design Principles

1. **Mobile-First Design**: Always use Tailwind's responsive prefixes (`sm:`, `md:`, `lg:`, `xl:`) to design for smaller screens first. Tailwind’s mobile-first approach ensures the design is adaptable to all screen sizes.
2. **Component-Based Design**: Break down the UI into reusable components like product cards, buttons, and modals. This allows for easy maintenance and scalability.
3. **Consistent Spacing**: Stick to the defined spacing scale for padding, margins, and gaps. This ensures a unified look and feel across the website.
4. **Accessibility**: Ensure all interactive elements (buttons, links, forms) have proper focus states, hover effects, and meet accessibility standards such as color contrast.
5. **Hover/Active States**: Use hover and active effects for buttons, links, and cards to enhance interactivity and user experience.

---

## Layout Structure

### **Header**
- **Classes**: `flex justify-between items-center py-4 px-6 bg-primary text-white`
- **Description**: The header contains the logo and the navigation menu. Use a flex layout to position items horizontally and ensure it's responsive.
    - **Menu Links**: Use `flex space-x-4` for horizontal spacing between links.
    - **Dropdown Menus**: Use `relative` for positioning the dropdown and `absolute` for dropdown items. Example classes: `absolute hidden group-hover:block bg-white text-black rounded-lg shadow-lg`.
    - **Logo**: Place the logo on the left side using `flex-shrink-0` to prevent it from shrinking.

### **Footer**
- **Classes**: `bg-gray-800 text-white py-6`
- **Description**: The footer will contain important links like "Contact", "Privacy Policy", "About Us", etc.
    - **Links**: Use `text-gray-300 hover:text-white` for footer links to ensure good readability and interactivity.
    - **Layout**: Use `grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-5` to create a responsive grid layout for footer sections.

### **Content Area**
- **Classes**: `max-w-7xl mx-auto px-4 sm:px-6 lg:px-8`
- **Description**: The main content area where product cards and other components will appear. This area should adjust its padding based on the screen size.

---

## Product Cards
- **Classes**: `border border-gray-200 rounded-lg shadow-sm p-4 hover:shadow-lg`
- **Description**: The product cards will display the product image at the top, followed by the product name, review stars, country availability, and price in a clean, organized layout.

    - **Image**: Image at the top with `w-full h-auto rounded-t-lg` to maintain a responsive image aspect ratio.

    - **Product Name**: Product name below the image using `text-lg font-bold text-gray-700` for clear readability.

    - **Review Stars**: Review stars below the name using `flex space-x-1 items-center`. Each star can be represented using a `text-yellow-500` color for highlighted stars and a `text-gray-300` for un highlighted ones. Use `fa-star` icons.

    - **Country Availability**: Small section divided into two using `flex justify-between`. On the left, show the countries where the product is available (e.g., `text-sm text-gray-500` for styling), separated by a pipe symbol (`|`).

    - **Price**: On the right side of the availability section, display the price with `text-xl font-semibold text-accent` to make it stand out, ensuring it's aligned properly to the right with `text-right`.

---


## Recommended Tailwind Classes

### **Spacing**
- **Padding/Margin**: Stick to multiples of `4px` (e.g., `p-4`, `px-6`).
- **Grid Gaps**: Use `gap-2` for consistent spacing in grids (like the product grid).

### **Typography**
1. **Headings**: Use `font-bold` for main headings (e.g., product titles) and adjust size with `text-xl`, `text-2xl`, etc.
2. **Body Text**: Use `text-base` or `text-sm` for product descriptions or other textual content.

---

## Example Component Classes

### **Header with Menu Links and Dropdown**
- **Classes**:
    - Navigation: `flex justify-between items-center py-4 px-6 bg-primary text-white`
    - Menu Links: `flex space-x-4`
    - Dropdown Menu: `relative group`
    - Dropdown Item: `absolute hidden group-hover:block bg-white text-black rounded-lg shadow-lg`

### **Footer with Links**
- **Classes**: `bg-gray-800 text-white py-6`
    - Links: `text-gray-300 hover:text-white`
    - Footer Layout: `grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4`

### **Product Card**
- **Classes**: `border border-gray-200 rounded-lg shadow-sm p-4 hover:shadow-lg`
    - Image: `w-full h-auto rounded-t-lg`
    - Text: `text-lg font-bold text-gray-700`
    - Button: `px-4 py-2 bg-accent text-white rounded hover:bg-accent-dark transition duration-300`

---