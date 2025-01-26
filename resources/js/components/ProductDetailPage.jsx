import React, { useState } from 'react';
import { ChevronLeft, Star, ShoppingCart, Share } from 'lucide-react';

const ProductDetailPage = ({ product, onBack, onAddToCart, onViewStore }) => {
  const [selectedImage, setSelectedImage] = useState(0);

  // Dummy review data for the product
  const reviews = [
    {
      id: 1,
      name: 'Ahmad S.',
      rating: 5,
      date: '2 hari yang lalu',
      comment: 'Tenda sangat berkualitas dan mudah didirikan. Recommended!',
      image: '/api/placeholder/50/50'
    },
    {
      id: 2,
      name: 'Budi P.',
      rating: 4,
      date: '1 minggu yang lalu',
      comment: 'Bagus untuk camping keluarga. Ukuran pas dan nyaman.',
      image: '/api/placeholder/50/50'
    }
  ];

  // Additional product images
  const productImages = [
    product.image,
    '/api/placeholder/300/200',
    '/api/placeholder/300/200'
  ];

  return (
    <div className="bg-white min-h-screen">
      {/* Header */}
      <div className="relative">
        <button
          onClick={onBack}
          className="absolute top-4 left-4 z-10 bg-white/70 p-2 rounded-full"
        >
          <ChevronLeft />
        </button>

        {/* Product Image Carousel */}
        <div className="relative">
          <img
            src={productImages[selectedImage]}
            alt={product.name}
            className="w-full h-96 object-cover"
          />

          {/* Image Thumbnails */}
          <div className="flex justify-center space-x-2 mt-2 absolute bottom-4 left-0 right-0">
            {productImages.map((img, index) => (
              <button
                key={index}
                onClick={() => setSelectedImage(index)}
                className={`w-12 h-12 rounded-md overflow-hidden ${
                  selectedImage === index ? 'border-2 border-[#F1772A]' : ''
                }`}
              >
                <img
                  src={img}
                  alt={`Thumbnail ${index + 1}`}
                  className="w-full h-full object-cover"
                />
              </button>
            ))}
          </div>
        </div>
      </div>

      {/* Product Details */}
      <div className="p-4">
        <div className="flex justify-between items-center">
          <h1 className="text-2xl font-bold">{product.name}</h1>
          <div className="flex items-center space-x-2">
            <button className="bg-gray-100 p-2 rounded-full">
              <Share size={20} />
            </button>
          </div>
        </div>

        {/* Pricing and Rating */}
        <div className="flex justify-between items-center mt-4">
          <div>
            <span className="text-2xl font-bold text-[#F1772A]">
              Rp {product.price}/hari
            </span>
          </div>
          <div className="flex items-center">
            <Star size={20} className="text-yellow-500 mr-1" />
            <span className="font-semibold">{product.rating}</span>
          </div>
        </div>

        {/* Store Info */}
        <div
          onClick={onViewStore}
          className="flex items-center mt-2 cursor-pointer hover:bg-gray-100 p-2 rounded-lg"
        >
          <img
            src="/api/placeholder/40/40"
            alt="Store Logo"
            className="w-10 h-10 rounded-full mr-3"
          />
          <div>
            <p className="font-semibold">{product.location}</p>
            <p className="text-sm text-gray-500">Kunjungi Toko</p>
          </div>
        </div>

        {/* Description */}
        <div className="mt-4">
          <h2 className="font-bold text-lg mb-2">Deskripsi</h2>
          <p className="text-gray-600">
            {product.name} adalah pilihan tepat untuk petualangan outdoor Anda.
            Dirancang dengan bahan berkualitas tinggi, produk ini memberikan kenyamanan
            dan kehandalan maksimal di segala kondisi.
          </p>
        </div>

        {/* Reviews Section */}
        <div className="mt-6">
          <div className="flex justify-between items-center mb-4">
            <h2 className="font-bold text-lg">Ulasan Pelanggan</h2>
            <span className="text-[#F1772A]">Lihat Semua</span>
          </div>

          {reviews.map(review => (
            <div key={review.id} className="border-b pb-4 mb-4">
              <div className="flex items-center">
                <img
                  src={review.image}
                  alt={review.name}
                  className="w-10 h-10 rounded-full mr-3"
                />
                <div>
                  <p className="font-semibold">{review.name}</p>
                  <div className="flex items-center">
                    {[...Array(review.rating)].map((_, i) => (
                      <Star key={i} size={16} className="text-yellow-500 mr-1" />
                    ))}
                    <span className="text-sm text-gray-500 ml-2">{review.date}</span>
                  </div>
                </div>
              </div>
              <p className="mt-2 text-gray-600">{review.comment}</p>
            </div>
          ))}
        </div>

        {/* Add to Cart Button */}
        <div className="fixed bottom-0 left-0 right-0 p-4 bg-white shadow-lg">
          <button
            onClick={() => onAddToCart(product)}
            className="w-full bg-[#F1772A] text-white py-3 rounded-lg flex items-center justify-center"
          >
            <ShoppingCart className="mr-2" />
            Tambah ke Keranjang
          </button>
        </div>
      </div>
    </div>
  );
};

export default ProductDetailPage;
