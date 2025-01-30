import type React from "react"
import { Users, GraduationCap, BookOpen, Award } from "lucide-react"

const QuickStats = () => {
  return (
    <div className="bg-gray-100 py-6">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="flex flex-wrap justify-around items-center text-center">
          <Stat icon={<GraduationCap className="h-6 w-6" />} value="1000+" label="Graduates" />
          <Stat icon={<Users className="h-6 w-6" />} value="95%" label="Employment Rate" />
          <Stat icon={<BookOpen className="h-6 w-6" />} value="50+" label="Programmes" />
          <Stat icon={<Award className="h-6 w-6" />} value="Accredited" label="by NCHE" />
        </div>
      </div>
    </div>
  )
}

const Stat = ({ icon, value, label }: { icon: React.ReactNode; value: string; label: string }) => (
  <div className="flex items-center space-x-2 my-2">
    {icon}
    <div>
      <div className="text-xl font-bold">{value}</div>
      <div className="text-sm text-gray-600">{label}</div>
    </div>
  </div>
)

export default QuickStats

