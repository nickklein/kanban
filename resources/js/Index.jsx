import Pagination from '@/Components/Pagination';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, usePage } from '@inertiajs/react';
import { useState, useEffect, useMemo } from 'react';

export default function Index(props) {

    return (
        <AuthenticatedLayout
            auth={props.auth}
            errors={props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Currently Streaming</h2>}
        >
            <Head title="Currently Streaming" />
            <div className={"max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8"}>
                <div className="flex bg-gray-900 min-h-screen gap-3">
                    {["To Do", "In Progress", "Done"].map((title, index) => (
                        <div key={index} className="flex flex-col w-1/3 bg-[#eceef0] rounded-lg p-3">
                        <h2 className="text-md font-bold text-black mb-4 uppercase">{title}</h2>
                        <div className="space-y-2">
                            {[1, 2, 3].map((task) => (
                            <div>
                                <div key={task}
                                    className="bg-[#fefefe] rounded-lg p-4 shadow-md transition-shadow duration-200 hover:shadow-lg hover:-translate-y-0.5"
                                >
                                    <p className="text-black font-medium">Task {task}</p>
                                </div>
                            </div>
                            ))}
                            <div className="mt-2 px-5 py-3 border-dashed text-gray-800">Add another card</div>
                        </div>
                        </div>
                    ))}
                </div>
            </div>
        </AuthenticatedLayout>
    )
}
