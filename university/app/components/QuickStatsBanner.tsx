import { GraduationCap, Briefcase, BookOpen, Award } from "lucide-react"

const stats = [
  { icon: GraduationCap, text: "1000+ Graduates" },
  { icon: Briefcase, text: "95% Employment Rate" },
  { icon: BookOpen, text: "50+ Programmes" },
  { icon: Award, text: "Accredited by NCHE" },
]

const QuickStatsBanner = () => {
  return (
    <div className="bg-blue-600 text-white py-4">
      <div className="container mx-auto px-4">
        <div className="flex flex-wrap justify-around items-center">
          {stats.map((stat, index) => (
            <div key={index} className="flex items-center space-x-2 my-2">
              <stat.icon className="w-6 h-6" />
              <span className="font-bold">{stat.text}</span>
            </div>
          ))}
        </div>
      </div>
    </div>
  )
}

export default QuickStatsBanner

