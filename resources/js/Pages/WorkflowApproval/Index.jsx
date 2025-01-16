import Pagination from '@/Components/Pagination';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link } from '@inertiajs/react';

export default function Index({ workflowapprovals }) {
    return (
        <>
            <AuthenticatedLayout
                header={
                    <>
                        <div className="flex items-center justify-between">
                            <h2 className="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                                Work Flow
                            </h2>
                            <Link
                                href={route('workflow_approvals.create')}
                                className="rounded bg-green-500 px-4 py-1 text-sm text-white shadow transition-all hover:bg-emerald-600"
                            >
                                Create new
                            </Link>
                        </div>
                    </>
                }
                currentRoute={route('workflow_approvals')}
            >
                <Head title="Workflow Approval" />

                <div className="py-12">
                    <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                        <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                            <div className="p-6 text-gray-900 dark:text-gray-100">
                                <div className="overflow-auto">
                                    <table className="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
                                        <thead className="border-b-2 border-gray-500 bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                                            <tr className="text-nowrap">
                                                <th className="w-1/12 px-3 py-3">
                                                    No
                                                </th>
                                                <th className="w-1/3 px-3 py-3">
                                                    Nodul
                                                </th>
                                                <th className="w-1/3 px-3 py-3">
                                                    Nama
                                                </th>
                                                <th className="w-1/3 px-3 py-3">
                                                    Email
                                                </th>
                                                <th className="w-1/3 px-3 py-3">
                                                    Position
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {workflowapprovals.data.map(
                                                (wa, key) => (
                                                    <tr className="hover:bg-sky-700">
                                                        <td className="px-3 py-3">
                                                            {key + 1}
                                                        </td>
                                                        <td className="px-3 py-3">
                                                            {wa.modul}
                                                        </td>
                                                        <td className="px-3 py-3">
                                                            {wa.name}
                                                        </td>
                                                        <td className="px-3 py-3">
                                                            {wa.email}
                                                        </td>
                                                        <td className="px-3 py-3">
                                                            {wa.position}
                                                        </td>
                                                    </tr>
                                                ),
                                            )}
                                        </tbody>
                                    </table>
                                </div>
                                <Pagination links={workflowapprovals.links} />
                            </div>
                        </div>
                    </div>
                </div>
            </AuthenticatedLayout>
        </>
    );
}
