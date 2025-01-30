import { ShieldCheck, BookOpen, Beaker, GraduationCap } from "lucide-react"

const reasons = [
  {
    icon: BookOpen,
    title: "Industry-Ready Curriculum",
    description: "Our programs are designed in collaboration with industry leaders to ensure relevance.",
  },
  {
    icon: ShieldCheck,
    title: "Experienced Faculty",
    description: "Learn from renowned professors and industry experts with years of experience.",
  },
  {
    icon: Beaker,
    title: "State-of-the-Art Facilities",
    description: "Access cutting-edge labs and resources to enhance your learning experience.",
  },
  {
    icon: GraduationCap,
    title: "Scholarships",
    description: "We offer various scholarships to support deserving students in their academic journey.",
  },
]

const WhyChooseUs = () => {
  return (
    <section className="py-16 bg-white">
      <div className="container mx-auto px-4">
        <h2 className="text-3xl font-bold text-center mb-8">Why Choose Us?</h2>
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
          {reasons.map((reason, index) => (
            <div key={index} className="text-center">
              <reason.icon className="w-12 h-12 mx-auto mb-4 text-blue-600" />
              <h3 className="text-xl font-semibold mb-2">{reason.title}</h3>
              <p className="text-gray-600">{reason.description}</p>
            </div>
          ))}
        </div>
      </div>
    </section>
  )
}

export default WhyChooseUs

