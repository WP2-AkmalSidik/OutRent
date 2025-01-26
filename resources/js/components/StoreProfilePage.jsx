import React, { useState } from 'react';
import { ChevronLeft, MapPin, Star } from 'lucide-react';

const StoreProfilePage = ({ store, onBack }) => {
  const [activeTab, setActiveTab] = useState('products');

  // Dummy products for the store
  const storeProducts = [
    { id: 1, name: 'Adventure Tent', category: 'Tenda', price: 50, rating: 4.5, image: '/api/placeholder/300/200' },
    { id: 2, name: 'Hiking Backpack', category: 'Tas', price: 30, rating: 4.8, image: '/api/placeholder/300/200' },
    { id: 3, name: 'Sleeping Bag', category: 'Perlengkapan', price: 25, rating: 4.3, image: '/api/placeholder/300/200' }
  ];

  return (
    <div className="bg-white min-h-screen">
      {/* Header */}
      <div className="relative bg-[#172B46] text-white p-4">
        <button
          onClick={onBack}
          className="absolute top-4 left-4 z-10"
        >
          <ChevronLeft color="white" />
        </button>

        <div className="flex flex-col items-center">
          <img
            src="/api/placeholder/100/100"
            alt="Store Logo"
            className="w-24 h-24 rounded-full border-4 border-white"
          />
          <h1 className="text-2xl font-bold mt-4">{store.name}</h1>
          <div className="flex items-center mt-2">
            <Star size={20} className="text-yellow-500 mr-1" />
            <span>{store.rating} ({store.reviewCount} Ulasan)</span>
          </div>
        </div>
      </div>

      {/* Store Details */}
      <div className="p-4">
        <div className="bg-gray-100 rounded-lg p-4">
          <div className="flex items-center mb-2">
            <MapPin size={20} className="text-[#F1772A] mr-2" />
            <p>{store.address}</p>
          </div>
          <p className="text-gray-600 mt-2">{store.description}</p>
        </div>

        {/* Tabs */}
        <div className="flex mt-6 border-b">
          <button
            onClick={() => setActiveTab('products')}
            className={`flex-1 pb-2 ${
              activeTab === 'products'
                ? 'border-b-2 border-[#F1772A] text-[#F1772A]'
                : 'text-gray-500'
            }`}
          >
            Produk
          </button>
          <button
            onClick={() => setActiveTab('about')}
            className={`flex-1 pb-2 ${
              activeTab === 'about'
                ? 'border-b-2 border-[#F1772A] text-[#F1772A]'
                : 'text-gray-500'
            }`}
          >
            Tentang
          </button>
        </div>

        {/* Content based on active tab */}
        {activeTab === 'products' && (
          <div className="grid grid-cols-2 gap-4 mt-4">
            {storeProducts.map(product => (
              <div
                key={product.id}
                className="bg-white rounded-lg shadow-md overflow-hidden"
              >
                <img
                  src={product.image}
                  alt={product.name}
                  className="w-full h-40 object-cover"
                />
                <div className="p-3">
                  <h3 className="font-semibold">{product.name}</h3>
                  <div className="flex justify-between items-center mt-2">
                    <span className="text-[#F1772A] font-bold">
                      Rp {product.price}/hari
                    </span>
                    <div className="flex items-center">
                      <Star size={16} className="text-yellow-500 mr-1" />
                      <span>{product.rating}</span>
                    </div>
                  </div>
                </div>
              </div>
            ))}
          </div>
        )}

        {activeTab === 'about' && (
          <div className="mt-4">
            <h2 className="text-lg font-bold mb-2">Tentang Toko</h2>
            <p className="text-gray-600">
              Kami adalah penyedia peralatan outdoor terkemuka yang berdedikasi
              untuk memberikan pengalaman terbaik bagi para petualang. Dengan
              koleksi lengkap dan berkualitas, kami siap mendukung setiap
              perjalanan Anda.
            </p>
            <div className="mt-4">
              <h3 className="font-semibold">Informasi Kontak</h3>
              <p className="text-gray-600">Email: info@rentoutdoor.com</p>
              <p className="text-gray-600">Telepon: +62 812-3456-7890</p>
            </div>
          </div>
        )}
      </div>
    </div>
  );
};

export default StoreProfilePage;
