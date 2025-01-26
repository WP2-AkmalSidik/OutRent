import React from 'react';

const CartTab = ({ cartItems, setCartItems, calculateTotal }) => {
  return (
    <div className="p-4">
      <h2 className="text-xl font-bold text-[#F1772A] mb-4">Keranjang Sewa</h2>
      {cartItems.length === 0 ? (
        <p className="text-center text-gray-500">Keranjang kosong</p>
      ) : (
        <>
          {cartItems.map(item => (
            <div key={item.id} className="flex justify-between items-center bg-white shadow-md rounded-lg p-3 mb-3">
              <div className="flex items-center">
                <img src={item.image} alt={item.name} className="w-16 h-16 rounded-md mr-3 object-cover" />
                <div>
                  <h3 className="font-semibold">{item.name}</h3>
                  <p className="text-sm text-gray-500">Rp {item.price}/hari</p>
                </div>
              </div>
              <button
                onClick={() => setCartItems(cartItems.filter(i => i.id !== item.id))}
                className="text-red-500"
              >
                Hapus
              </button>
            </div>
          ))}
          <div className="bg-white rounded-lg p-4 mt-4">
            <div className="flex justify-between mb-2">
              <span>Total Sewa</span>
              <span className="font-bold text-[#F1772A]">Rp {calculateTotal()}</span>
            </div>
            <button className="w-full bg-[#F1772A] text-white py-2 rounded-md">
              Lanjutkan Booking
            </button>
          </div>
        </>
      )}
    </div>
  );
};

export default CartTab;
