import React, { useState, useEffect } from 'react';

import {Line} from 'react-chartjs-2';

import useEffectCustom from '../hooks/useEffectCustom';

const ChartWrapper = ({chartData}) => {
    const [chart, setChart] = useState({
        data: {},
        options: {}
    });

    useEffect(() => {
        setChart({
            data: {
                labels: chartData.labels,
                datasets: [
                    {
                        label: 'コメント',
                        data: chartData.comments,
                        fill: false,
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgba(255, 99, 132, 0.2)',
                    },
                    {
                        label: 'ログイン',
                        data: chartData.logins,
                        fill: false,
                        backgroundColor: 'rgb(54, 162, 235)',
                        borderColor: 'rgba(54, 162, 235, 0.2)',
                    },
                    {
                        label: 'リアクション',
                        data: chartData.reactions,
                        fill: false,
                        backgroundColor: 'rgb(0, 0, 0)',
                        borderColor: 'rgba(0, 0, 0, 0.2)',
                    },
                ],
            },
            options: {}
        });
    }, [chartData]);

    return (
        <Line data={chart.data} options={chart.options} />
    );
};

export default ChartWrapper;
