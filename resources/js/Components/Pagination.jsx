import { Link } from '@inertiajs/react';

export default function Pagination({ links }) {
    return (
        <nav className="mt-4 text-center">
            {links.map((link) => (
                <Link
                    preserveScroll
                    href={link.url || ''}
                    key={link.label}
                    className={
                        'inline-block rounded-lg px-3 py-2 text-xs text-gray-200 ' +
                        (link.active ? 'bg-gray-950' : ' ') +
                        (!link.url
                            ? 'cursor-not-allowed !text-gray-500'
                            : 'hover:bg-gray-950')
                    }
                    dangerouslySetInnerHTML={{ __html: link.label }}
                ></Link>
            ))}
        </nav>
    );
}
