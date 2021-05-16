import React, { useState, useEffect } from 'react';

import {Line} from 'react-chartjs-2';

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
                        backgroundColor: 'rgb(255, 157, 131)',
                        borderColor: 'rgba(255, 157, 133)',
                        yAxisID: 'y1'
                    },
                    {
                        label: 'ログイン',
                        data: chartData.logins,
                        fill: false,
                        backgroundColor: 'rgb(255, 217, 118)',
                        borderColor: 'rgba(255, 217, 118)',
                        yAxisID: 'y1'
                    },
                    {
                        label: 'リアクション',
                        data: chartData.reactions,
                        fill: false,
                        backgroundColor: 'rgb(146, 199, 255)',
                        borderColor: 'rgba(146, 199, 255)',
                        yAxisID: 'y2'
                    },
                ],
            },
            options: {
                scales: {
                    y1: {
                        title: {
                            display: true,
                            text: 'コメント/ログイン'
                        }
                    },
                    y2: {
                        position: 'right',
                        title: {
                            display: true,
                            text: 'リアクション'
                        }
                    }
                }
            }
        });
    }, [chartData]);

    return (
        <Line data={chart.data} options={chart.options}  type="line"/>
    );
};

export default ChartWrapper;
