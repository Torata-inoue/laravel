import { useEffect, useRef } from "react";

/**
 * useEffectの初回レンダーを防ぐ
 * @param func
 * @param dependencyList
 */
const useEffectCustom = (func, dependencyList) => {
    const firstFlgRef = useRef(true);

    useEffect(() => {
        if (!firstFlgRef.current) {
            func();
        } else {
            firstFlgRef.current = false;
        }
    }, dependencyList);
};

export default useEffectCustom;
