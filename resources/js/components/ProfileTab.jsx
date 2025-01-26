import React from 'react';
import { User } from 'lucide-react';

const ProfileTab = () => {
  return (
    <div className="p-4">
      <div className="text-center mb-6">
        <div className="mx-auto w-24 h-24 bg-[#F1772A] rounded-full flex items-center justify-center mb-4">
          <User color="white" size={48} />
        </div>
        <h2 className="text-xl font-bold">Petualang Sejati</h2>
        <p className="text-gray-600">adventure@email.com</p>
      </div>
      <div className="bg-white rounded-lg shadow-md p-4">
        <h3 className="font-semibold mb-2">Informasi Pribadi</h3>
        <div className="space-y-2">
          <div className="flex justify-between">
            <span>Nama</span>
            <span className="font-medium">John Doe</span>
          </div>
          <div className="flex justify-between">
            <span>Email</span>
            <span className="font-medium">adventure@email.com</span>
          </div>
          <div className="flex justify-between">
            <span>No. Telepon</span>
            <span className="font-medium">+62 812 3456 7890</span>
          </div>
        </div>
      </div>
      <button className="w-full bg-red-500 text-white py-2 rounded-md mt-4">Logout</button>
    </div>
  );
};

export default ProfileTab;
