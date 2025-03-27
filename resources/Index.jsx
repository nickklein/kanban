import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, usePage } from '@inertiajs/react';

export default function Index(props) {

    return (
        <AuthenticatedLayout
            auth={props.auth}
            errors={props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Kanban</h2>}
        >
            <Head title="Kanban" />
            <div className={"max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8"}>
                    Hello
            </div>
        </AuthenticatedLayout>
    )
}
