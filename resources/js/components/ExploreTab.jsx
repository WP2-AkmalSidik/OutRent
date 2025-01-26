import React, { useState } from 'react';
import { Search, Star } from 'lucide-react';
import ProductDetailPage from './ProductDetailPage';
import StoreProfilePage from './StoreProfilePage';

const ExploreTab = ({
  cartItems,
  setCartItems,
  onProductDetail,
  onStoreDetail,
  onBackToExplore
}) => {
  const [searchQuery, setSearchQuery] = useState('');
  const [selectedProduct, setSelectedProduct] = useState(null);
  const [selectedStore, setSelectedStore] = useState(null);

  const rentalItems = [
    {
      id: 1,
      name: 'Adventure Tent',
      category: 'Tenda',
      price: 50,
      rating: 4.5,
      location: 'Outdoor Gear Jakarta',
      storeName: 'Outdoor Gear Jakarta',
      image: '/api/placeholder/300/200',
      storeRating: 4.7,
      storeReviewCount: 128,
      storeAddress: 'Jl. Outdoor No. 123, Jakarta Selatan'
    },
    {
      id: 2,
      name: 'Hiking Backpack',
      category: 'Tas',
      price: 30,
      rating: 4.8,
      location: 'Mountain Gear Bandung',
      storeName: 'Mountain Gear Bandung',
      image: '/api/placeholder/300/200',
      storeRating: 4.9,
      storeReviewCount: 256,
      storeAddress: 'Jl. Pendaki No. 45, Bandung'
    },
    {
      id: 3,
      name: 'Sleeping Bag',
      category: 'Perlengkapan',
      price: 25,
      rating: 4.3,
      location: 'Camp Master Bogor',
      storeName: 'Camp Master Bogor',
      image: '/api/placeholder/300/200',
      storeRating: 4.5,
      storeReviewCount: 92,
      storeAddress: 'Jl. Berkemah No. 78, Bogor'
    }
  ];

  const filteredItems = rentalItems.filter(item =>
    item.name.toLowerCase().includes(searchQuery.toLowerCase())
  );

  // If a product is selected, show product detail page
  if (selectedProduct) {
    onProductDetail();
    return (
      <ProductDetailPage
        product={selectedProduct}
        onBack={() => {
          setSelectedProduct(null);
          onBackToExplore();
        }}
        onAddToCart={(item) => {
          setCartItems([...cartItems, item]);
          setSelectedProduct(null);
          onBackToExplore();
        }}
        onViewStore={() => {
          setSelectedStore({
            name: selectedProduct.storeName,
            rating: selectedProduct.storeRating,
            reviewCount: selectedProduct.storeReviewCount,
            address: selectedProduct.storeAddress
          });
          setSelectedProduct(null);
          onStoreDetail();
        }}
      />
    );
  }

  // If a store is selected, show store profile page
  if (selectedStore) {
    onStoreDetail();
    return (
      <StoreProfilePage
        store={selectedStore}
        onBack={() => {
          setSelectedStore(null);
          onBackToExplore();
        }}
      />
    );
  }

  return (
    <div className="p-3">
      <div className="mb-3 flex items-center bg-white rounded-lg shadow-sm">
        <Search className="ml-2 text-gray-500 text-sm" size={18} />
        <input
          type="text"
          placeholder="Cari barang outdoor..."
          value={searchQuery}
          onChange={(e) => setSearchQuery(e.target.value)}
          className="w-full p-2 text-sm rounded-lg focus:outline-none"
        />
      </div>

      <div className="text-center mb-4">
        <h1 className="text-3xl font-bold">
          <span className="text-[#172B46]">OUT</span>
          <span className="text-[#F1772A]">R</span>
          <span className="text-[#172B46]">ENT</span>
        </h1>
        <p className="text-xs text-gray-600">Solusi Sewa Peralatan Outdoor</p>
      </div>

      <div className="grid grid-cols-2 gap-2">
        {filteredItems.map(item => (
          <div
            key={item.id}
            className="bg-white rounded-lg shadow-md overflow-hidden"
            onClick={() => setSelectedProduct(item)}
          >
            <img
              src={item.image}
              alt={item.name}
              className="w-full h-32 object-cover"
            />
            <div className="p-2">
              <h3 className="font-semibold text-sm truncate">{item.name}</h3>
              <div className="flex justify-between items-center mt-1">
                <span className="text-[#F1772A] font-bold text-xs">
                  Rp {item.price}/hari
                </span>
                <div className="flex items-center">
                  <Star size={12} className="text-yellow-500 mr-1" />
                  <span className="text-xs">{item.rating}</span>
                </div>
              </div>
              <div
                onClick={(e) => {
                  e.stopPropagation();
                  setSelectedStore({
                    name: item.storeName,
                    rating: item.storeRating,
                    reviewCount: item.storeReviewCount,
                    address: item.storeAddress
                  });
                }}
                className="mt-1 text-xs text-gray-600 hover:text-[#F1772A] truncate"
              >
                {item.location}
              </div>
              <button
                onClick={(e) => {
                  e.stopPropagation();
                  setCartItems([...cartItems, item]);
                }}
                className="mt-1 w-full bg-[#F1772A] text-white py-1 rounded-md text-xs hover:bg-orange-600"
              >
                Sewa Sekarang
              </button>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
};

export default ExploreTab;
