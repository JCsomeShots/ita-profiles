import { useContext, useEffect } from "react";
import getStudenDetail from "../store/reducers/getStudenDetail/thunks/studenDetailThunk";
import { TSmallScreenContext } from "../interfaces/interfaces";
import { useAppDispatch } from "./ReduxHooks";
import { SmallScreenContext } from "../context/SmallScreenContext";
import { useStudentIdContext } from "../context/StudentIdContext";

const useStudentDetailHook = (rol?: string | null) => {
    const { isMobile }: TSmallScreenContext = useContext(SmallScreenContext)
    const { studentUUID } = useStudentIdContext()
    const studenSUID = localStorage.getItem("studenSUID")
    const getStudent = useAppDispatch();

    useEffect(() => {
        if (typeof rol === "string" && rol === "user") {
            getStudent(getStudenDetail(studenSUID))
        } else if (!rol && studentUUID) {
            getStudent(getStudenDetail(studentUUID))
        }

    }, [getStudent, rol, studenSUID, studentUUID])

    return { isMobile }
}

export {
    useStudentDetailHook,
}