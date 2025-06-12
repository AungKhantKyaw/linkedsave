import React from 'react';
import { Link, useForm, usePage, router } from '@inertiajs/react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function Listing({ userId, bookmarks }) {
  const { delete: destroy } = useForm();
  const { flash } = usePage().props;

  const handleDelete = (id) => {
    if (confirm('Are you sure you want to delete this bookmark?')) {
      destroy(route('bookmark.destroy', id), {
        onSuccess: () => {
          router.visit(route('bookmark.listing', userId), {
            method: 'get',
            preserveState: true,
            preserveScroll: true,
          });
        },
        onError: (errors) => {
          console.error('Deletion failed:', errors);
        },
      });
    }
  };

  return (
    <AuthenticatedLayout
      header={
        <h2 className="text-xl font-semibold leading-tight text-gray-800">
          Bookmarks Listing
        </h2>
      }
    >
      <Head title="Bookmarks Listing" />

      <div className="p-6 max-w-3xl mx-auto">
        {flash?.message && (
          <div className="mb-4 p-2 bg-green-100 text-green-700 rounded">
            {flash.message}
          </div>
        )}

        {bookmarks.length === 0 ? (
          <p className="text-gray-600">No bookmarks yet.</p>
        ) : (
          <ul className="space-y-2">
            {bookmarks.map((bookmark) => (
              <li
                key={bookmark.id}
                className="p-3 bg-white border rounded shadow-sm flex justify-between items-center"
              >
                <a
                  href={bookmark.link_url}
                  target="_blank"
                  rel="noopener noreferrer"
                  className="text-blue-600 hover:underline"
                >
                  {bookmark.link_url}
                </a>

                <button
                  onClick={() => handleDelete(bookmark.id)}
                  className="text-red-500 hover:underline text-sm ml-4"
                >
                  Delete
                </button>
              </li>
            ))}
          </ul>
        )}
      </div>
    </AuthenticatedLayout>
  );
}
