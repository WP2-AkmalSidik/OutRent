import React from 'react';
import { Calendar } from 'lucide-react';

const BookingTab = () => {
  const bookingHistory = [
    { id: 1, itemName: 'Adventure Tent', status: 'Selesai', date: '15 Jan 2024' },
    { id: 2, itemName: 'Hiking Backpack', status: 'Sedang Disewa', date: '20 Jan 2024' }
  ];

  return (
    <div className="p-4">
      <h2 className="text-xl font-bold text-[#F1772A] mb-4">Riwayat Booking</h2>
      {bookingHistory.map(booking => (
        <div key={booking.id} className="bg-white rounded-lg shadow-md p-4 mb-3 flex justify-between items-center">
          <div>
            <h3 className="font-semibold">{booking.itemName}</h3>
            <div className="flex items-center mt-1">
              <Calendar size={16} className="mr-2 text-[#F1772A]" />
              <span className="text-sm text-gray-600">{booking.date}</span>
            </div>
            <span className={`mt-2 px-2 py-1 rounded-full text-xs ${
              booking.status === 'Selesai' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'
            }`}>
              {booking.status}
            </span>
          </div>
        </div>
      ))}
    </div>
  );
};

export default BookingTab;
