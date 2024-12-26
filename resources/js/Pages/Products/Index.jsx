import { Link } from "@inertiajs/react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { useState } from "react";

export default function Index({ products }) {
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
                <div className="grid grid-cols-1 md:grid-cols-4 gap-6 bg-gray-100 px-4 sm:px-6 pt-8">
                    {products.map((product) => (
                        <div
                            key={product.id}
                            className="bg-white shadow-md rounded-lg p-4 mb-3 hover:scale-105 transform transition duration-300 ease-in-out text-center"
                        >
                            <h2 className="text-lg font-semibold">
                                <Link
                                    href={`/products/${product.id}`}
                                >
                                    <img
                                        src={product.imageSRC}
                                        alt={product.name}
                                        className="w-auto h-64 object-cover rounded-t-lg mb-4 mx-auto"
                                    />
                                    <hr />
                                    {product.name}
                                </Link>
                            </h2>
                            <p className="text-gray-700 font-medium">
                                ${product.price}
                            </p>

                            <h2 className="mt-4">
                                <Link
                                    href={`/products/${product.id}`}
                                    className="inline-block text-white py-2 px-4 rounded-full text-sm font-medium shadow-md transition-all duration-300"
                                    style={{
                                        background: `radial-gradient(circle at ${gradientPosition.x}% ${gradientPosition.y}%, #4f93ff, #0056b3)`,
                                    }}
                                    onMouseMove={handleMouseMove}
                                >
                                    ดูรายละเอียด
                                </Link>
                            </h2>
                        </div>
                    ))}
                </div>
            </AuthenticatedLayout>
        </>
    );
}
