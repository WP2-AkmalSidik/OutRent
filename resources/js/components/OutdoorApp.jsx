import React, { useState, useRef } from 'react';
import Navbar from './Navbar';
import ExploreTab from './ExploreTab';
import CartTab from './CartTab';
import BookingTab from './BookingTab';
import ProfileTab from './ProfileTab';

const OutdoorRentalApp = () => {
  const [activeTab, setActiveTab] = useState('explore');
  const [cartItems, setCartItems] = useState([]);
  const [isNavVisible, setIsNavVisible] = useState(true);
  const [isDetailPage, setIsDetailPage] = useState(false);

  const scrollRef = useRef(null);
  const lastScrollTop = useRef(0);

  const handleScroll = () => {
    if (!scrollRef.current) return;
    const currentScrollTop = scrollRef.current.scrollTop;

    if (currentScrollTop > lastScrollTop.current) {
      setIsNavVisible(false);
    } else {
      setIsNavVisible(true);
    }

    lastScrollTop.current = currentScrollTop;
  };

  const calculateTotal = () => {
    return cartItems.reduce((total, item) => total + item.price, 0).toFixed(2);
  };

  const renderContent = () => {
    switch (activeTab) {
      case 'explore':
        return (
          <ExploreTab
            cartItems={cartItems}
            setCartItems={setCartItems}
            onProductDetail={() => setIsDetailPage(true)}
            onStoreDetail={() => setIsDetailPage(true)}
            onBackToExplore={() => {
              setIsDetailPage(false);
              setIsNavVisible(true);
            }}
          />
        );
      case 'cart':
        return <CartTab cartItems={cartItems} setCartItems={setCartItems} calculateTotal={calculateTotal} />;
      case 'booking':
        return <BookingTab />;
      case 'profile':
        return <ProfileTab />;
      default:
        return null;
    }
  };

  return (
    <div
      className="w-screen h-screen max-w-md mx-auto bg-gray-100 flex flex-col relative"
      style={{ maxHeight: '100vh' }}
    >
      <div
        ref={scrollRef}
        onScroll={handleScroll}
        className="flex-grow overflow-auto pb-20"
      >
        {renderContent()}
      </div>

      {!isDetailPage && (
        <Navbar
          isNavVisible={isNavVisible}
          activeTab={activeTab}
          setActiveTab={setActiveTab}
          cartItemsCount={cartItems.length}
        />
      )}
    </div>
  );
};

export default OutdoorRentalApp;
