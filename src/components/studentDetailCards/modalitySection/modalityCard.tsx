import { v4 as uuidv4 } from 'uuid'
import remoto from '../../../assets/svg/remoto.svg'
import { useAppSelector } from '../../../hooks/ReduxHooks'

const ModalityCard: React.FC = () => {
  const { modality: modalityData, isLoadingModality, isErrorModality } = useAppSelector(state => state.ShowStudentReducer.studentAdditionalModality)

  return (
    <div className="flex flex-col gap-3" data-testid="ModalityCard">
      <h3 className="font-bold text-lg">Modalidad</h3>
      {isLoadingModality && 'loadingModality'}
      {isErrorModality && "errorModality"}
      {!isLoadingModality && <div className="flex-col items-center ">
        {modalityData.map((modality) => (
          <div key={uuidv4()} className="flex gap-3 py-1">
            <img src={remoto} className="pr-2" alt="remoto" />
            <p className="text-sm font-semibold text-black-2">{modality}</p>
          </div>
        ))}
      </div>}
    </div>
  )
}

export default ModalityCard
