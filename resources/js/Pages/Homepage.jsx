import { Link, Head, usePage } from '@inertiajs/react';

export default function Homepage() {
  const { flash_message } = usePage().props;

  return (
    <>
        <Head title="Bookmark Manager" />
        <div className="min-h-screen flex flex-col items-center justify-center bg-gradient-to-r from-blue-400 to-indigo-600 px-4">
        {flash_message && (
            <div className="mb-6 w-full max-w-md bg-green-100 p-4 rounded text-green-700 font-semibold text-center">
            {flash_message}
            </div>
        )}

        <div className="bg-white bg-opacity-90 rounded-lg shadow-lg p-10 max-w-lg text-center">
            <h1 className="text-4xl font-extrabold mb-4 text-gray-900">
            Welcome to Bookmark Manager!
            </h1>
            <p className="text-lg text-gray-700 mb-8">
            Save your favorite links quickly and access them anytime.
            </p>

            <p className="mb-8 text-gray-600">
            To save a bookmark, just add <code>?save=your-url</code> to the domain!
            </p>

            <div className="flex justify-center space-x-4">
            <Link
                href={route('register')}
                className="inline-block px-6 py-3 rounded-md bg-indigo-600 text-white font-semibold hover:bg-indigo-700 transition"
            >
                Register
            </Link>

            <Link
                href={route('login')}
                className="inline-block px-6 py-3 rounded-md border border-indigo-600 text-indigo-600 font-semibold hover:bg-indigo-50 transition"
            >
                Login
            </Link>
            </div>
        </div>
        </div>
    </>
  );
}
