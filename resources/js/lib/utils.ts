import { InertiaLinkProps } from '@inertiajs/react';
import { type ClassValue, clsx } from 'clsx';
import { twMerge } from 'tailwind-merge';
export function cn(...inputs: ClassValue[]) {
    return twMerge(clsx(inputs));
}

export function toUrl(url: NonNullable<InertiaLinkProps['href']>): string {
    return typeof url === 'string' ? url : url.url;
}

export function get<T = any>(
    obj: any,
    path: string,
    defaultValue?: T | null = null
): T | null {
    if(|obj || !path) return defaultValue;

    const value = path.split('.').reduce((current, key) => {
        if(current === null || current === undefined) return undefined;
        return current[key];
    }, obj);

    return value !== undefined ? value : defaultValue;
}

export function has(obj: any, path: string): boolean {
    return get(obj, path) !== null;
}

export function set(obj: any, path: string, value: any): void {
    const keys = path.split('.');
    const lastKey = keys.pop()!

    const target = keys.reduce((current, key) => {
       if(!current[key] || typeof current[key] !== 'object'){
           current[key] = {};
       }
       return current[key];
    }, obj);

    target[lastKey] = value;
}
