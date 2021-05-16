import React from 'react';

import 'bootstrap/dist/css/bootstrap.min.css';

const Table = ({chartData}) => {
    return (
        <div>
            <table className="table table-hover">
                <thead>
                <tr>
                    <td>期間</td>
                    <td>ログイン回数</td>
                    <td>リアクション回数</td>
                    <td>コメント回数</td>
                </tr>
                </thead>
                <tbody>
                {
                    chartData.labels.map((label, i) =>
                        <tr key={i}>
                            <td>{label}</td>
                            <td>{chartData.logins[i]}</td>
                            <td>{chartData.reactions[i]}</td>
                            <td>{chartData.comments[i]}</td>
                        </tr>
                    )
                }
                </tbody>
            </table>
        </div>
    );
};

export default Table;
