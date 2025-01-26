import React from 'react';
import { Home, ShoppingCart, User, List } from 'lucide-react';

const Navbar = ({ isNavVisible, activeTab, setActiveTab, cartItemsCount }) => {
  return (
    <div
      className={`fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 p-3 flex justify-around items-center transition-transform duration-300 ${
        isNavVisible ? 'translate-y-0' : 'translate-y-full'
      }`}
      style={{ maxWidth: '28rem', margin: '0 auto' }}
    >
      <button
        onClick={() => setActiveTab('explore')}
        className={`flex flex-col items-center ${activeTab === 'explore' ? 'text-[#F1772A]' : 'text-gray-500'}`}
      >
        <Home size={24} />
        <span className="text-xs mt-1">Explore</span>
      </button>
      <button
        onClick={() => setActiveTab('cart')}
        className={`flex flex-col items-center ${activeTab === 'cart' ? 'text-[#F1772A]' : 'text-gray-500'}`}
      >
        <ShoppingCart size={24} />
        <span className="text-xs mt-1">Keranjang</span>
        {cartItemsCount > 0 && (
          <span className="absolute ml-6 -mt-4 bg-[#F1772A] text-white text-xs rounded-full px-2">
            {cartItemsCount}
          </span>
        )}
      </button>
      <button
        onClick={() => setActiveTab('booking')}
        className={`flex flex-col items-center ${activeTab === 'booking' ? 'text-[#F1772A]' : 'text-gray-500'}`}
      >
        <List size={24} />
        <span className="text-xs mt-1">Booking</span>
      </button>
      <button
        onClick={() => setActiveTab('profile')}
        className={`flex flex-col items-center ${activeTab === 'profile' ? 'text-[#F1772A]' : 'text-gray-500'}`}
      >
        <User size={24} />
        <span className="text-xs mt-1">Profil</span>
      </button>
    </div>
  );
};

export default Navbar;
