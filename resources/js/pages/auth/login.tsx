
import { Head, useForm } from '@inertiajs/react';
import React, { FormEventHandler } from 'react';

import AuthLayout from '@/layouts/auth-layout';
import InputError from '@/components/input-error';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { LoaderCircle } from 'lucide-react';
import { Checkbox } from '@/components/ui/checkbox';
import TextLink from '@/components/text-link';

type LoginForm = {
    username: string;
    password: string;
    remember: boolean;
}

interface LoginProps {
    status?: string;
    canResetPassword: boolean;
}

export default function Login({status, canResetPassword}: LoginProps) {
    const { data, setData, post, processing, errors, reset } = useForm<Required<LoginForm>>({
        username: '',
        password: '',
        remember: false,
    });

    const generateFakePassword= (): string => {
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        let password = '';
        for(let i = 0; i < 24; i++) {
            password += characters.charAt(Math.floor(Math.random() * characters.length));
        }

        return password;
    }

    const handlePasswordKeyDown = (e: React.KeyboardEvent<HTMLInputElement>) => {
        if(e.key === 'Enter'){
            e.preventDefault();
            setData('password', generateFakePassword());
            submit(e as unknown as React.FormEvent);
        }
    }

    const submit: FormEventHandler = (e) => {
        e.preventDefault();
        post("/auth/sign-in"), {
            onFinish: () => reset('password')
        }
    }

    return (
        <AuthLayout
            title="Log in to your account"
            description="Enter your email and password below to log in"
        >
            <Head title="Log in" />
            <div className="p-4 w-full text-black">
                <h3 className="text-4xl font-bold">Iniciar sessão</h3>
                <h4 className="text-md mt-3">Introduza os seus dados para aceder à sua conta.</h4>
            </div>
            <div className="p-4 h-auto text-gray-600">
                <form className="flex flex-col gap-7" onSubmit={submit}>
                    <div>
                        <label htmlFor="price" className="block text-sm/6 font-medium">
                            Utilizador
                        </label>
                        <div className="mt-2">
                            <div className="flex items-center bg-white/5">
                                <Input
                                    id="username"
                                    name="username"
                                    type="text"
                                    value={data.username}
                                    autoComplete="username"
                                    placeholder="Utilizador ou nome.apelido@pharoll.com"
                                    onChange={(e) => setData('username', e.target.value)}
                                    className="block min-w-0 grow py-4 px-3 text-base placeholder:text-gray-30 border border-[#014122] focus:border-blue-500 focus:ring-0 focus:outline-none rounded-none sm:text-sm/6"
                                />
                            </div>
                            <InputError message={errors.username} />
                        </div>
                    </div>

                    <div>
                        <label htmlFor="password" className="block text-sm/6 font-medium">
                            Password
                        </label>
                        <div className="mt-2">
                            <div className="flex relative items-center bg-white/5">
                                <Input
                                    id="password"
                                    name="password"
                                    type="password"
                                    placeholder="Password"
                                    onKeyDown={handlePasswordKeyDown}
                                    onChange={(e) => setData('password', e.target.value)}
                                    className="block min-w-0 grow py-4 px-3 text-base placeholder:text-gray-30 border border-[#014122] focus:border-blue-500 focus:ring-0 focus:outline-none rounded-none sm:text-sm/6"
                                />
                                <button type="button" data-hs-toggle-password='{"target": "#password"}' className="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-300 rounded-e-md focus:outline-hidden focus:text-[#014122] dark:text-gray-400 dark:focus:text-[#014122]">
                                    <svg className="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path className="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path>
                                        <path className="hs-password-active:hidden" d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"></path>
                                        <path className="hs-password-active:hidden" d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"></path>
                                        <line className="hs-password-active:hidden" x1="2" x2="22" y1="2" y2="22"></line>
                                        <path className="hidden hs-password-active:block" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                        <circle className="hidden hs-password-active:block" cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </button>
                            </div>
                            <InputError message={errors.password} />
                        </div>
                    </div>

                    <Button type="submit" className="bg-[#014122] w-full p-5 text-white uppercase font-bold text-sm rounded-sm text-center hover:bg-gray-600 hover:cursor-pointer" tabIndex={4} disabled={processing}>
                        { processing && <LoaderCircle className="h-4 w-4 animate-spin" />}
                        Iniciar sessão
                    </Button>

                    <div className="flex items-center space-x-3">
                        <Checkbox
                            id="remember"
                            name="remember"
                            checked={data.remember}
                            onClick={() => setData('remember', !data.remember)}
                            tabIndex={3}
                        />
                        <label htmlFor="remember">Manter a sessão iniciada</label>
                    </div>

                    <div className="text-muted-foreground text-center text-sm">
                        {canResetPassword && (
                            <TextLink href={"account/password/forgot"} className="ml-auto text-sm text-blue-800 text-decoration-none" tabIndex={5}>
                                Forgot password?
                            </TextLink>
                        )}
                    </div>
                </form>
            </div>
            <div className="text-gray-500 text-center uppercase mt-30">
                <p className="text-[0.70rem]">Copyright &copy; 2026 &bull; Pharoll &bull; All rights reserved</p>
            </div>
        </AuthLayout>
    );
}
