import { type PropsWithChildren } from 'react';

interface AuthLayoutProps {
    name?: string;
    title?: string;
    description?: string;
}

export default function AuthSimpleLayout({
    children,
    title,
    description,
}: PropsWithChildren<AuthLayoutProps>) {
    return (
        <div className="flex min-h-screen">
            <div className="flex w-full items-center justify-center bg-white p-8 md:w-1/2">
                <div className="w-full max-w-md">{children}</div>
            </div>
            <div
                className="relative flex hidden w-1/2 items-center justify-center rounded-l-[30px] p-32 text-white md:block"
                style={{
                    backgroundImage: 'url(/images/bg.jpg)',
                    backgroundSize: 'cover',
                    backgroundPosition: 'center',
                }}
            >
                <div className="absolute top-0 left-0 h-full w-full rounded-l-[30px] bg-[#014122]/90 p-32">
                    <p className="text-4xl leading-normal font-bold">
                        Domina o teu inventário com o GStock.
                    </p>
                    <p className="text-1xl mt-5 leading-loose">
                        A solução inteligente para o controlo total do teu
                        armazém. Gere a entrada de matérias-primas, organiza o
                        fluxo de caixas e monitoriza os teus produtos finais,
                        tudo numa interface rápida desenhada para o ritmo do teu
                        dia a dia.
                    </p>
                </div>
            </div>
        </div>
    );
}
