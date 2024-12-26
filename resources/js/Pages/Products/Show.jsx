import { Link } from "@inertiajs/react";
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { useState } from "react";


export default function Show({ product }) {

    const [gradientPosition, setGradientPosition] = useState({ x: 50, y: 50 });

    const handleMouseMove = (e) => {
            const rect = e.currentTarget.getBoundingClientRect();
            const x = ((e.clientX - rect.left) / rect.width) * 100;
            const y = ((e.clientY - rect.top) / rect.height) * 100;
            setGradientPosition({ x, y });
        };

    return (
        <>
        <AuthenticatedLayout>
        <div className="min-h-screen flex items-center justify-center bg-gray-100 py-10">

            <div className="bg-white shadow-lg rounded-lg p-6 max-w-lg w-full text-center">
                <img
                    src={product.imageSRC}
                    alt={product.name}
                    className="w-auto h-64 object-cover rounded-lg mb-4 mx-auto"
                />
                <h1 className="text-2xl font-bold text-gray-800 mb-2">
                    {product.name}
                </h1>
                <p className="text-gray-600 mb-4">{product.description}</p>
                <p className="text-lg font-semibold text-gray-700 mb-6">
                    Price: ${product.price}
                </p>
                <hr className="mb-6" />
                <Link
                    href="/products"
                    className="inline-flex items-center text-white py-2 px-4 rounded-full text-sm font-medium shadow-md transition-all duration-300"
                    style={{
                        background: `radial-gradient(circle at ${gradientPosition.x}% ${gradientPosition.y}%, #4f93ff, #0056b3)`,
                    }}
                    onMouseMove={handleMouseMove}
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-5 h-5 mr-2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3"
                        />
                    </svg>
                    กลับ
                </Link>
            </div>
        </div>
        </AuthenticatedLayout>
        </>
    );
}
