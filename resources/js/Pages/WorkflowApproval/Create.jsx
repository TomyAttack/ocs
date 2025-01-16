import InputError from '@/Components/InputError';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, useForm } from '@inertiajs/react';

import { useEffect, useState } from 'react';

export default function AddWorkflowApproval() {
    const { data, setData, post, errors, processing } = useForm({
        modul: '',
        type: '',
        value: '',
        nik: '',
        name: '',
        email: '',
        position: '',
    });

    const optionTypes = [
        { value: 'Custom', label: 'Custom' },
        { value: 'HRIS', label: 'HRIS' },
        { value: 'Total Amount >=', label: 'Total Amount >=' },
        { value: 'Total Amount >', label: 'Total Amount >' },
        { value: 'Total Amount <=', label: 'Total Amount <=' },
        { value: 'Total Amount <', label: 'Total Amount <' },
    ];

    const [selectedLevel, setSelectedLevel] = useState(false);

    const [selectedNIK, setSelectedNIK] = useState(false);

    useEffect(() => {
        const fetchData = async () => {
            if (data.nik) {
                const response = await fetch(`/employee/list?nik=${data.nik}`);
                const dataResponse = await response.json();

                dataResponse.name
                    ? setData({
                          modul: data.modul,
                          type: data.type,
                          value: data.value,
                          nik: data.nik,
                          name: dataResponse.name,
                          email: dataResponse.email,
                          position: dataResponse.position,
                      })
                    : setData({
                          modul: data.modul,
                          type: data.type,
                          value: data.value,
                          nik: data.nik,
                          name: '',
                          email: '',
                          position: '',
                      });
            }
        };
        fetchData();
    }, [data.nik]);
    const handleChange = (option) => {
        if (option == '') {
            setSelectedNIK(false);
            setSelectedLevel(false);
        } else if (option == 'Custom') {
            setSelectedNIK(true);
            setSelectedLevel(false);
        } else if (option == 'HRIS') {
            setSelectedLevel(true);
            setSelectedNIK(false);
        } else {
            setSelectedNIK(true);
            setSelectedLevel(true);
        }
    };

    function submit(e) {
        e.preventDefault();
        // console.log(e);
        post(route('workflow_approvals.store'));
    }

    return (
        <>
            <AuthenticatedLayout
                header={
                    <h2 className="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                        Work Flow - Create
                    </h2>
                }
                currentRoute={route('workflow_approvals')}
            >
                <Head title="Create Workflow Approval" />

                <div className="py-12">
                    <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                        <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                            <div className="p-6 text-gray-900 dark:text-gray-100">
                                <div className="mx-auto">
                                    <form onSubmit={submit}>
                                        <div>
                                            <label className="form-label">
                                                Nama Modul
                                            </label>
                                            <input
                                                type="text"
                                                value={data.modul}
                                                onChange={(e) =>
                                                    setData(
                                                        'modul',
                                                        e.target.value,
                                                    )
                                                }
                                                className="form-control"
                                                placeholder="Nama Modul"
                                                required
                                            />
                                            <InputError
                                                message={errors.modul}
                                                className="mt-2"
                                            />
                                        </div>

                                        <div className="mt-4">
                                            <label className="form-label">
                                                Type
                                            </label>
                                            <select
                                                value={data.type}
                                                className="form-control"
                                                onChange={(e) => {
                                                    handleChange(
                                                        e.target.value,
                                                    );
                                                    setData(
                                                        'type',
                                                        e.target.value,
                                                    );
                                                }}
                                                required
                                            >
                                                <option value="">
                                                    Pilih Type
                                                </option>
                                                {optionTypes.map(
                                                    ({ value, label }) => (
                                                        // eslint-disable-next-line react/jsx-key
                                                        <option value={value}>
                                                            {label}
                                                        </option>
                                                    ),
                                                )}
                                            </select>
                                            <InputError
                                                message={errors.type}
                                                className="mt-2"
                                            />
                                        </div>

                                        <div className="mt-4">
                                            <label className="form-label">
                                                Value/Level
                                            </label>

                                            {!selectedLevel ? (
                                                <input
                                                    type="text"
                                                    placeholder="Value/Level"
                                                    className="form-control-disabled"
                                                    disabled
                                                />
                                            ) : (
                                                <input
                                                    type="number"
                                                    value={data.value}
                                                    onChange={(e) =>
                                                        setData(
                                                            'value',
                                                            e.target.value,
                                                        )
                                                    }
                                                    placeholder="Value/Level"
                                                    className="form-control"
                                                    required
                                                />
                                            )}
                                            <InputError
                                                message={errors.value}
                                                className="mt-2"
                                            />
                                        </div>

                                        <div className="mt-4">
                                            <label className="form-label">
                                                NIK
                                            </label>

                                            {!selectedNIK ? (
                                                <input
                                                    type="text"
                                                    className="form-control-disabled"
                                                    placeholder="NIK"
                                                    disabled
                                                />
                                            ) : (
                                                <input
                                                    type="text"
                                                    value={data.nik}
                                                    onChange={(e) => {
                                                        setData(
                                                            'nik',
                                                            e.target.value,
                                                        );
                                                    }}
                                                    className="form-control"
                                                    placeholder="NIK"
                                                    required
                                                />
                                            )}
                                            <InputError
                                                message={errors.nik}
                                                className="mt-2"
                                            />
                                        </div>

                                        <div className="mt-4">
                                            <label className="form-label">
                                                Nama
                                            </label>

                                            <input
                                                type="text"
                                                value={data.name}
                                                onChange={(e) =>
                                                    setData(
                                                        'name',
                                                        e.target.value,
                                                    )
                                                }
                                                className="form-control"
                                                placeholder="Nama"
                                                required
                                            />
                                            <InputError
                                                message={errors.name}
                                                className="mt-2"
                                            />
                                        </div>

                                        <div className="mt-4">
                                            <label className="form-label">
                                                Email
                                            </label>

                                            <input
                                                type="email"
                                                value={data.email}
                                                onChange={(e) =>
                                                    setData(
                                                        'email',
                                                        e.target.value,
                                                    )
                                                }
                                                className="form-control"
                                                placeholder="Email"
                                                required
                                            />
                                            <InputError
                                                message={errors.email}
                                                className="mt-2"
                                            />
                                        </div>

                                        <div className="mt-4">
                                            <label className="form-label">
                                                Position
                                            </label>
                                            <select
                                                value={data.position}
                                                className="form-control"
                                                onChange={(e) => {
                                                    setData(
                                                        'position',
                                                        e.target.value,
                                                    );
                                                }}
                                                required
                                            >
                                                <option value="">
                                                    Pilih Position
                                                </option>
                                                <option value="Staff">
                                                    Staff
                                                </option>
                                                <option value="Supervisor">
                                                    Supervisor
                                                </option>
                                                <option value="Manager">
                                                    Manager
                                                </option>
                                            </select>
                                            <InputError
                                                message={errors.position}
                                                className="mt-2"
                                            />
                                        </div>

                                        <div className="mt-4 block"></div>

                                        <div className="mt-4 flex items-center justify-end">
                                            <button
                                                className="rounded-md bg-green-500 px-4 py-1 text-sm text-white"
                                                disabled={processing}
                                            >
                                                Submit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </AuthenticatedLayout>
        </>
    );
}
